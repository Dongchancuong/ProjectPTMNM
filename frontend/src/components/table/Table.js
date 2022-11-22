import React from "react"
import axios from "axios"
import BootstrapTable from "react-bootstrap-table-next";
import paginationFactory from "react-bootstrap-table2-paginator";
import filterFactory, { numberFilter, textFilter, dateFilter, selectFilter, Comparator } from 'react-bootstrap-table2-filter';
import 'react-bootstrap-table2-paginator/dist/react-bootstrap-table2-paginator.min.css';
import 'react-bootstrap-table2-filter/dist/react-bootstrap-table2-filter.min.css';
import '../../styles/Table.scss';
import ButtonCreate from "../button/ButtonCreate";
import ButtonView from "../button/ButtonView";
import ButtonEdit from "../button/ButtonEdit"
import ButtonDelete from "../button/ButtonDelete";
import ButtonChucVu from "../button/ButtonChucVu";

class Table extends React.Component {
    state = {
        listNV: [],
        listKH: [],
        listHD: [],
        listTK: [],
        listCV: [],
        list: [],
        getnewid: null,
        tknewaccount: null
    }

    tinhTrangFormatter = (cell, row, rowIndex, formatExtraData) => {// Hiển thị tình trạng ở object tình trạng
        return (
            <>{formatExtraData[cell]}</>
        );
    }

    gioitinhFormatter = (cell, row, rowIndex, formatExtraData) => {// Hiển thị Nam hoặc Nữ ở object giới tính
        return (
            <>{formatExtraData[cell]}</>
        );
    }

    handleEventButton = (cell, row, rowIndex) => {
        return (
            <>
                {this.props.type === "qlchucvu" ? <ButtonChucVu></ButtonChucVu> : null}
                {this.props.type === "qltaikhoan" || this.props.type === "qlchucvu" ? null : <ButtonView value={this.state.list[rowIndex]} type={this.props.type} idtaikhoan={this.state.tknewaccount} />}
                {this.props.type === "qlchucvu" ? null : <ButtonEdit value={this.state.list[rowIndex]} type={this.props.type} idtaikhoan={this.state.listTK} idchucvu={this.state.listCV} />}
                {this.props.type === "qlchucvu" ? null : <ButtonDelete value={row} type={this.props.type} />}
            </>
        )
    }

    // handleEventButtonTaiKhoan = (cell, row, rowIndex) => {
    //     return (
    //         <>
    //             <ButtonEdit value={row} type={this.props.type} idchucvu={this.state.listCV} />
    //             <ButtonDelete value={row} type={this.props.type} />
    //         </>
    //     )
    // }

    rowEvents = {
        onClick: (e, row, rowIndex) => {
            this.handleEventButton(e, row, rowIndex)
        }
    }

    columnCV = [//Title của table Chức Vụ
        {
            dataField: 'idchucvu',
            text: 'ID Chức Vụ',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Chức Vụ'
            })
        },
        {
            dataField: 'tenchucvu',
            text: 'Tên Chức Vụ',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm tên chức vụ'
            })
        }
    ]
    columnTK = [//Title của table Tài Khoản
        {
            dataField: 'idtaikhoan',
            text: 'ID Tài Khoản',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Tài Khoản'
            })
        },
        {
            dataField: 'idchucvu',
            text: 'ID Chức vụ',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Chức Vụ'
            })
        },
        {
            dataField: 'tentaikhoan',
            text: 'Tên Tài Khoản',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm Tên tài khoản'
            })
        },
        {
            dataField: 'matkhau',
            text: 'Mật khẩu'
        },
        {
            formatter: this.handleEventButton
        }
    ]
    columnNV = [//Title của table Nhân Viên
        {
            dataField: 'idnhanvien',
            text: 'ID Nhân Viên',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Nhân Viên'
            })
        },
        {
            dataField: 'hoten',
            text: 'Họ và tên',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm Họ và Tên'
            })
        },
        {
            dataField: 'gioitinh',
            text: 'Giới tính',
            sort: true,
            // formatter: this.gioitinhFormatter,
            // formatExtraData: {
            //     0: 'Nữ',
            //     1: 'Nam'
            // },
            filter: selectFilter({
                placeholder: 'Chọn giới tính ',
                options: {
                    'Nữ': 'Nữ',
                    'Nam': 'Nam'
                }
            })
        },
        {
            dataField: 'sdt',
            text: 'Số điện thoại',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm số điện thoại'
            })
        },
        {
            dataField: 'email',
            text: 'Email',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm email'
            })
        },
        {
            formatter: this.handleEventButton
        }
    ];
    columnKH = [
        {
            dataField: 'idkhachhang',
            text: 'ID Khách Hàng',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Khách Hàng'
            })
        },
        {
            dataField: 'idtaikhoan',
            text: 'ID Tài Khoản',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Tài Khoản'
            })
        },
        {
            dataField: 'hoten',
            text: 'Họ và tên',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm Họ và Tên'
            })
        },
        {
            dataField: 'sdt',
            text: 'Số điện thoại',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm số điện thoại'
            })
        },
        {
            dataField: 'email',
            text: 'Email',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm email'
            })
        },
        {
            formatter: this.handleEventButton
        }
    ];
    columnHD = [
        {
            dataField: 'idhoadon',
            text: 'ID Hóa Đơn',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Hóa Đơn'
            })
        },
        {
            dataField: 'idkhachhang',
            text: 'ID Khách Hàng',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Khách Hàng'
            })
        },
        {
            dataField: 'hoten',
            text: 'Họ và tên',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm Họ và Tên'
            })
        },
        {
            dataField: 'visible',
            text: 'Tình trạng',
            sort: true,
            formatter: this.tinhTrangFormatter,
            formatExtraData: {
                0: <>Hủy bỏ</>,
                1: <>Đang chờ</>,
                2: <>Đã xác nhận</>,
                3: <>Đang vận chuyển</>
            },
            filter: selectFilter({
                placeholder: 'Chọn tình trạng',
                options: {
                    0: <>Hủy bỏ</>,
                    1: <>Đang chờ</>,
                    2: <>Đã xác nhận</>,
                    3: <>Đang vận chuyển</>
                }
            })
        }
    ];

    defaultSorted = [{
        dataField: 'name',
        order: 'desc'//thứ tự từ cao đến thấp
    }];

    async componentDidMount() {
        let res = await axios.get(
            this.props.type === "qlchucvu" ? "http://localhost:8000/api/cv/"
                : this.props.type === "qltaikhoan" ? "http://localhost:8000/api/tk"
                    : this.props.type === "qlnhanvien" ? "http://localhost:8000/api/nv/"
                        : this.props.type === "qlkhachhang" ? "http://localhost:8000/api/kh/"
                            : this.props.type === "qlhoadon" ? "http://localhost:8000/api/hd/"
                                : null
        );
        let resCV = await axios.get("http://localhost:8000/api/cv")
        let resTK = await axios.get("http://localhost:8000/api/tk")
        let resgetnewid = await axios.get("http://localhost:8000/api/nv/getnewid")
        let resNewAccount = await axios.get("http://localhost:8000/api/tk/newaccount")
        this.setState({
            list: res && res.data && res.data.data ? res.data.data : [],
            listCV: resCV && resCV.data && resCV.data.data ? resCV.data.data : [],
            listTK: resTK && resTK.data && resTK.data.data ? resTK.data.data : [],
            tknewaccount: resNewAccount && resNewAccount.data && resNewAccount.data.data ? resNewAccount.data.data : [],
            getnewid: resgetnewid.data.data
        })
    }

    //https://react-bootstrap-table.github.io/react-bootstrap-table2/docs/basic-pagination.html
    //Bootstrap phân trang React
    render() {
        return (
            <div className="bg-white">
                {this.props.type === "qlkhachhang" ? null : <ButtonCreate type={this.props.type} getnewid={this.state.getnewid} idtaikhoan={this.state.tknewaccount} idchucvu={this.state.listCV} />}
                <BootstrapTable
                    striped
                    hover
                    keyField="id"
                    // data={this.state.list}//dữ liệu
                    data={this.state.list}//tiêu đề
                    columns={this.props.type === "qlnhanvien" ? this.columnNV
                        : this.props.type === "qltaikhoan" ? this.columnTK
                            : this.props.type === "qlchucvu" ? this.columnCV
                                : this.props.type === "qlkhachhang" ? this.columnKH
                                    : this.props.type === "qlhoadon" ? this.columnHD
                                        : null}//tiêu đề
                    pagination={paginationFactory({ sizePerPage: 10 })}//có lỗi phân trang
                    defaultSorted={this.defaultSorted}
                    filter={filterFactory()}
                    rowEvents={this.rowEvents}
                />
            </div>
        )
    }
}

export default Table
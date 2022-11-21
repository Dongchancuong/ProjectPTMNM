import React, { useState } from "react"
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

class Table extends React.Component {
    state = {
        list: [],
        lastid: null,
        listNV: this.props.listNV,
        listTK: []
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
                <ButtonView value={this.state.list[rowIndex]} type={this.props.type} />
                <ButtonEdit value={this.state.list[rowIndex]} type={this.props.type} />
                <ButtonDelete value={row} type={this.props.type} />
            </>
        )
    }

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
        },
        {
            dataField: 'visible',
            text: 'Tình trạng',
            sort: true,
            filter: selectFilter({
                placeholder: 'Chọn tình trạng',
                options: {
                    1: 'Hiện',
                    0: 'Ẩn'
                }
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

        this.setState({
            list: res && res.data && res.data.data ? res.data.data : []
        })

        let res2 = await axios.get("http://localhost:8000/api/nv/lastid")
        this.setState({
            lastid: res2.data.data
        })

        let res3 = await axios.get("http://localhost:8000/api/tk")
        this.setState({
            listTK: res3 && res3.data && res3.data.data ? res3.data.data : []
        })
    }

    //https://react-bootstrap-table.github.io/react-bootstrap-table2/docs/basic-pagination.html
    //Bootstrap phân trang React
    render() {
        return (
            <div className="bg-white">
                {this.props.type === "qltaikhoan" || this.props.type === "qlkhachhang" ? null : <ButtonCreate type={this.props.type} lastid={this.state.lastid} idtaikhoan={this.state.listTK} />}
                <BootstrapTable
                    striped
                    hover
                    keyField="id"
                    data={this.state.list}//dữ liệu
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
import React from "react"
import axios from "axios"
import BootstrapTable from "react-bootstrap-table-next";
import paginationFactory from "react-bootstrap-table2-paginator";
import filterFactory, { numberFilter, textFilter, dateFilter, selectFilter } from 'react-bootstrap-table2-filter';
import 'react-bootstrap-table2-paginator/dist/react-bootstrap-table2-paginator.min.css';
import 'react-bootstrap-table2-filter/dist/react-bootstrap-table2-filter.min.css';
import '../../styles/Table.scss';
import Moment from 'moment';//format tiền VNĐ
import Button from "react-bootstrap/esm/Button";

function gioitinhFormatter(cell, row, rowIndex, formatExtraData) {// Hiển thị Nam hoặc Nữ ở object giới tính
    return (
        <>{formatExtraData[cell]}</>
    );
}

function xemThongTinChiTiet(index) {
    console.log('Gia tri rowIndex: ', index)
    return (
        <>
        </>
    );
}

function handleEventButton(cell, row, rowIndex) {
    return (
        <>
            <Button variant="secondary" onClick={() => xemThongTinChiTiet(row)}>Xem</Button>
            <Button variant="primary">Sửa</Button>
            <Button variant="danger">Xóa</Button>
        </>
    )
}

const columns = [//Title của table
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
        formatter: gioitinhFormatter,
        formatExtraData: {
            0: 'Nữ',
            1: 'Nam'
        },
        filter: selectFilter({
            placeholder: 'Chọn giới tính ',
            options: {
                0: 'Nữ',
                1: 'Nam'
            }
        })
    },
    // {
    //     dataField: 'ngaysinh',
    //     text: 'Ngày sinh',
    //     sort: true,
    //     filter: dateFilter(),
    //     formatter: (cell, row) => {
    //         return (
    //             <>{Moment(row.ngaysinh).format('DD-MM-YYYY')}</>
    //         )
    //     }
    // },
    {
        dataField: 'sdt',
        text: 'Số điện thoại',
        sort: true,
        filter: numberFilter()
    },
    {
        dataField: 'email',
        text: 'Email',
        sort: true,
        filter: textFilter()
    },
    // {
    //     dataField: 'ngayvaolam',
    //     text: 'Ngày vào làm',
    //     sort: true,
    //     filter: dateFilter(),
    //     formatter: (cell, row) => {
    //         return (
    //             <>{Moment(row.ngayvaolam).format('DD-MM-YYYY')}</>
    //         )
    //     }
    // },
    // {
    //     dataField: 'luong',
    //     text: 'Lương',
    //     sort: true,
    //     filter: numberFilter(),
    //     formatter: (cell, row) => {
    //         return (
    //             <>{new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND'}).format(row.luong)}</>
    //         )
    //     }
    // }
    {
        formatter: handleEventButton
    }
];

const defaultSorted = [{
    dataField: 'name',
    order: 'desc'//thứ tự từ cao đến thấp
}];

class TableQLNhanVien extends React.Component {
    state = {
        list: []
    }

    async componentDidMount() {
        let res = await axios.get("http://localhost:8000/api/nv/");
        console.log('check res: ', res.data.data)
        this.setState({
            list: res && res.data && res.data.data ? res.data.data : []
        })
    }

    //https://react-bootstrap-table.github.io/react-bootstrap-table2/docs/basic-pagination.html
    //Bootstrap phân trang React
    render() {
        return (
            <div className="bg-white">
                <BootstrapTable
                    striped
                    hover
                    keyField="id"
                    data={this.state.list}//dữ liệu
                    columns={columns}//tiêu đề
                    pagination={paginationFactory({ sizePerPage: 10 })}//phân trang
                    defaultSorted={defaultSorted}
                    filter={filterFactory()}
                />
            </div>
        )
    }
}

export default TableQLNhanVien
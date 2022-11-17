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

class TableQLNhanVien extends React.Component {
    state = {
        list: []
    }

    gioitinhFormatter = (cell, row, rowIndex, formatExtraData) => {// Hiển thị Nam hoặc Nữ ở object giới tính
        return (
            <>{formatExtraData[cell]}</>
        );
    }

    handleEventButton = (cell, row, rowIndex) => {

        return (
            <>
                <ButtonView value={this.state.list[rowIndex]} />
                <ButtonEdit value={this.state.list[rowIndex]} />
                <ButtonDelete value={row} />
            </>
        )
    }

    rowEvents = {
        onClick: (e, row, rowIndex) => {
            this.handleEventButton(e, row, rowIndex)
        }
    }


    columnTK = [
        {
            text: 'ID Tài Khoản',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Tài Khoản'
            })
        },
        {
            text: 'ID Chức vụ',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm ID Chức Vụ'
            })
        },
        {
            text: 'Tên Tài Khoản',
            sort: true,
            filter: textFilter({
                placeholder: 'Tìm Tên tài khoản'
            })
        },
        {
            text: 'Mật khẩu'
        },

    ]
    columnNV = [//Title của table
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
            formatter: this.gioitinhFormatter,
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

    defaultSorted = [{
        dataField: 'name',
        order: 'desc'//thứ tự từ cao đến thấp
    }];

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
                <ButtonCreate />
                <BootstrapTable
                    striped
                    hover
                    keyField="id"
                    data={this.state.list}//dữ liệu
                    columns={this.props.type === "qlnhanvien" ? this.columnNV
                        : this.props.type === "qltaikhoan" ? this.columnTK
                            : null}//tiêu đề
                    pagination={paginationFactory({ sizePerPage: 10 })}//phân trang
                    defaultSorted={this.defaultSorted}
                    filter={filterFactory()}
                    rowEvents={this.rowEvents}
                />
            </div>
        )
    }
}

export default TableQLNhanVien
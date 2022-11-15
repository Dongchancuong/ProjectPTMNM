import React from "react"
import axios from "axios"
import BootstrapTable from "react-bootstrap-table-next";
import paginationFactory from "react-bootstrap-table2-paginator";
import filterFactory, { numberFilter, textFilter, dateFilter, selectFilter } from 'react-bootstrap-table2-filter';
import 'react-bootstrap-table2-paginator/dist/react-bootstrap-table2-paginator.min.css';
import 'react-bootstrap-table2-filter/dist/react-bootstrap-table2-filter.min.css';
import '../../styles/Table.scss';
import Button from "react-bootstrap/esm/Button";
import ButtonCreate from "../button/ButtonCreate";
import ButtonView from "../button/ButtonView";
import ButtonEdit from "../button/ButtonEdit"
import ButtonDelete from "../button/ButtonDelete";

class TableQLNhanVien extends React.Component {
    state = {
        list: [],
        currentRow: 0
    }

    gioitinhFormatter = (cell, row, rowIndex, formatExtraData) => {// Hiển thị Nam hoặc Nữ ở object giới tính
        return (
            <>{formatExtraData[cell]}</>
        );
    }

    handleEventButton = (cell, row, rowIndex) => {
        //this.state.list[this.state.currentRow]
        // console.log("no:", TableQLNhanVien.state.list)
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

    columns = [//Title của table
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
            formatter: this.handleEventButton
            // formatExtraData: (cell, row, rowIndex) => {
            //     return (
            //         <>
            //             <ButtonView value={row} />
            //             <Button variant="primary">Sửa</Button>
            //             <ButtonDelete />
            //         </>
            //     )
            // }
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
                {/* <ButtonCreate value={this.list.data} /> */}
                <BootstrapTable
                    striped
                    hover
                    keyField="id"
                    data={this.state.list}//dữ liệu
                    columns={this.columns}//tiêu đề
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
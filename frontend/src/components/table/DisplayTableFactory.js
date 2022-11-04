import React from "react"
import axios from "axios"
import BootstrapTable from "react-bootstrap-table-next";
import paginationFactory from "react-bootstrap-table2-paginator";
import filterFactory, { numberFilter, textFilter, dateFilter } from 'react-bootstrap-table2-filter';
import 'react-bootstrap-table2-paginator/dist/react-bootstrap-table2-paginator.min.css';

// function dateFormatter(cell, row, rowIndex, formatExtraData) {
//     const formatDate = Moment(row.ngaysinh).format('DD-MM-YYYY');
//     return (
//         <>{formatDate}</>
//     )
// }

const columns = [
    {
        dataField: 'idnhanvien',
        text: 'ID Nhân Viên',
        sort: true,
        filter: textFilter()
    },
    {
        dataField: 'idtaikhoan',
        text: 'ID Tài Khoản',
        sort: true,
        filter: textFilter()
    },
    {
        dataField: 'hoten',
        text: 'Họ và tên',
        sort: true,
        filter: textFilter()
    },
    {
        dataField: 'gioitinh',
        text: 'Giới tính',
        sort: true
    },
    {
        dataField: 'ngaysinh',
        text: 'Ngày sinh',
        sort: true,
        filter: dateFilter()
    },
    {
        dataField: 'sdt',
        text: 'Số điện thoại',
        sort: true,
        filter: numberFilter()
    },
    {
        dataField: 'diachi',
        text: 'Địa chỉ',
        sort: true,
        filter: textFilter()
    },
    {
        dataField: 'email',
        text: 'Email',
        sort: true,
        filter: textFilter()
    },
    {
        dataField: 'ngayvaolam',
        text: 'Ngày vào làm',
        sort: true,
        filter: dateFilter()
    },
    {
        dataField: 'luong',
        text: 'Lương',
        sort: true,
        filter: numberFilter()
    }
];

const defaultSorted = [{
    dataField: 'name',
    order: 'desc'//thứ tự từ cao đến thấp
}];

const selectRow = {//chọn dòng sẽ tô màu
    mode: 'checkbox',
    clickToSelect: true,
    style: { backgroundColor: '#c8e6c9' }
};

class DisplayTable extends React.Component {
    state = {
        list: []
    }
    // constructor(props) {
    //     super(props);
    //     this.state = {
    //         error: null,
    //         isLoaded: false,
    //         list: []
    //     }
    // }

    async componentDidMount() {
        //https://dummy.restapiexample.com/api/v1/employees
        //https://reqres.in/api/users?page=2
        //https://dummyjson.com/users
        let res = await axios.get("http://localhost:8000/api/nv/");
        console.log('check res: ', res.data.data)
        this.setState({
            list: res && res.data && res.data.data ? res.data.data : []
        })
    }

    // componentDidMount() {
    //     fetch("http://localhost:8000/api/nv").then(res => res.json()).then((result) => {
    //         this.setState({
    //             isLoaded: true,
    //             list: result
    //             // list: res && res.data && res.data.data ? res.data.data : []
    //         });
    //         console.log('check res: ', this.state.list)
    //     },
    //         (error) => {
    //             this.setState({
    //                 isLoaded: true,
    //                 error
    //             });
    //         })
    // }

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
                    selectRow={selectRow}//bấm để chọn
                    defaultSorted={defaultSorted}
                    filter={filterFactory()}
                />
            </div>
        )
    }
}

export default DisplayTable
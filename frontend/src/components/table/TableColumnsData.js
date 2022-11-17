// import { textFilter, selectFilter } from 'react-bootstrap-table2-filter';
// import ButtonView from "../button/ButtonView";
// import ButtonEdit from "../button/ButtonEdit"
// import ButtonDelete from "../button/ButtonDelete";

// const gioitinhFormatter = (cell, row, rowIndex, formatExtraData) => {// Hiển thị Nam hoặc Nữ ở object giới tính
//     return (
//         <>{formatExtraData[cell]}</>
//     );
// }

// const handleEventButton = (cell, row, rowIndex) => {
//     return (
//         <>
//             <ButtonView value={this.state.list[rowIndex]} />
//             <ButtonEdit value={this.state.list[rowIndex]} />
//             <ButtonDelete value={row} />
//         </>
//     )
// }

// export const TableColumnsData = [
//     {
//         module: 'Quản lý nhân viên',
//         columns: [
//             {
//                 dataField: 'idnhanvien',
//                 text: 'ID Nhân Viên',
//                 sort: true,
//                 filter: textFilter({
//                     placeholder: 'Tìm ID Nhân Viên'
//                 })
//             },
//             {
//                 dataField: 'hoten',
//                 text: 'Họ và tên',
//                 sort: true,
//                 filter: textFilter({
//                     placeholder: 'Tìm Họ và Tên'
//                 })
//             },
//             {
//                 dataField: 'gioitinh',
//                 text: 'Giới tính',
//                 sort: true,
//                 formatter: gioitinhFormatter,
//                 formatExtraData: {
//                     0: 'Nữ',
//                     1: 'Nam'
//                 },
//                 filter: selectFilter({
//                     placeholder: 'Chọn giới tính ',
//                     options: {
//                         0: 'Nữ',
//                         1: 'Nam'
//                     }
//                 })
//             },
//             // {
//             //     dataField: 'ngaysinh',
//             //     text: 'Ngày sinh',
//             //     sort: true,
//             //     filter: dateFilter(),
//             //     formatter: (cell, row) => {
//             //         return (
//             //             <>{Moment(row.ngaysinh).format('DD-MM-YYYY')}</>
//             //         )
//             //     }
//             // },
//             {
//                 dataField: 'sdt',
//                 text: 'Số điện thoại',
//                 sort: true,
//                 filter: textFilter({
//                     placeholder: 'Tìm số điện thoại'
//                 })
//             },
//             {
//                 dataField: 'email',
//                 text: 'Email',
//                 sort: true,
//                 filter: textFilter({
//                     placeholder: 'Tìm email'
//                 })
//             },
//             // {
//             //     dataField: 'ngayvaolam',
//             //     text: 'Ngày vào làm',
//             //     sort: true,
//             //     filter: dateFilter(),
//             //     formatter: (cell, row) => {
//             //         return (
//             //             <>{Moment(row.ngayvaolam).format('DD-MM-YYYY')}</>
//             //         )
//             //     }
//             // },
//             // {
//             //     dataField: 'luong',
//             //     text: 'Lương',
//             //     sort: true,
//             //     filter: numberFilter(),
//             //     formatter: (cell, row) => {
//             //         return (
//             //             <>{new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND'}).format(row.luong)}</>
//             //         )
//             //     }
//             // }
//             {
//                 formatter: handleEventButton
//                 // formatExtraData: (cell, row, rowIndex) => {
//                 //     return (
//                 //         <>
//                 //             <ButtonView value={row} />
//                 //             <Button variant="primary">Sửa</Button>
//                 //             <ButtonDelete />
//                 //         </>
//                 //     )
//                 // }
//             }
//         ]
//     }
// ]
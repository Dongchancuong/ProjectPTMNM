import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLHoaDon = ({ title, type }) => {
    return (
        <div className='qlhoadon'>
            <NavBarAdmin title={title} />
            <TableQLNhanVien type={type}/>
        </div>
    );
};

export default QLHoaDon
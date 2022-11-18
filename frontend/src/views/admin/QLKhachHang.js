import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLKhachHang = ({ title, type }) => {
    return (
        <div className='qlkhachhang'>
            <NavBarAdmin title={title} />
            <TableQLNhanVien type={type} />
        </div>
    );
};

export default QLKhachHang
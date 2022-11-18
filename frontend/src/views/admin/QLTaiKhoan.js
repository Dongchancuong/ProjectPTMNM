import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLTaiKhoan = ({ title, type }) => {
    return (
        <div className='qltaikhoan'>
            <NavBarAdmin title={title} />
            <TableQLNhanVien type={type} />
        </div>
    );
};

export default QLTaiKhoan
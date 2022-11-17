import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLTaiKhoan = ({ title }) => {
    return (
        <div className='qltaikhoan'>
            <NavBarAdmin title={title} />
            <TableQLNhanVien type="qltaikhoan" />
        </div>
    );
};

export default QLTaiKhoan
import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const QLTaiKhoan = ({ title }) => {
    return (
        <div className='qltaikhoan'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý tài khoản</h1>
        </div>
    );
};

export default QLTaiKhoan
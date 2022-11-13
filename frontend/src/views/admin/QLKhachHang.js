import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const QLKhachHang = ({ title }) => {
    return (
        <div className='qlkhachhang'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý khách hàng</h1>
        </div>
    );
};

export default QLKhachHang
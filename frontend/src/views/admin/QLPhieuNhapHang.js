import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const QLPhieuNhapHang = ({ title }) => {
    return (
        <div className='qlphieunhaphang'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý phiếu nhập hàng</h1>
        </div>
    );
};

export default QLPhieuNhapHang
import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const QLPhieuDatHang = ({ title }) => {
    return (
        <div className='qlphieudathang'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý phiếu đặt hàng</h1>
        </div>
    );
};

export default QLPhieuDatHang
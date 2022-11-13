import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const QLHoaDon = ({ title }) => {
    return (
        <div className='qlhoadon'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý hóa đơn</h1>
        </div>
    );
};

export default QLHoaDon
import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const QLCTKhuyenMai = ({ title }) => {
    return (
        <div className='qlctkhuyenmai'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý chương trình khuyến mãi</h1>
        </div>
    );
};

export default QLCTKhuyenMai
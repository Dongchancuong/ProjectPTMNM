import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const QLChucVu = ({ title }) => {
    return (
        <div className='qlchucvu'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý chức vụ</h1>
        </div>
    );
};

export default QLChucVu
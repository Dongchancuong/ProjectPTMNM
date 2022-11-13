import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const QLNhaCungCap = ({ title }) => {
    return (
        <div className='qlnhacungcap'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý nhà cung cấp</h1>
        </div>
    );
};

export default QLNhaCungCap
import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Table from '../../components/table/Table';

const QLKhachHang = ({ title, type }) => {
    return (
        <div className='qlkhachhang'>
            <NavBarAdmin title={title} />
            <Table type={type} />
        </div>
    );
};

export default QLKhachHang
import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Table from '../../components/table/Table';

const QLTaiKhoan = ({ title, type }) => {
    return (
        <div className='qltaikhoan'>
            <NavBarAdmin title={title} />
            <Table type={type} />
        </div>
    );
};

export default QLTaiKhoan
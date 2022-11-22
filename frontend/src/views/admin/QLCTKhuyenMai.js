import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Table from '../../components/table/Table';

const QLCTKhuyenMai = ({ title, type }) => {
    return (
        <div className='qlctkhuyenmai'>
            <NavBarAdmin title={title} />
            <Table type={type} />
        </div>
    );
};

export default QLCTKhuyenMai
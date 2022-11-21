import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Table from '../../components/table/Table';

const QLChucVu = ({ title, type }) => {
    return (
        <div className='qlchucvu'>
            <NavBarAdmin title={title} />
            <Table type={type}/>
        </div>
    );
};

export default QLChucVu
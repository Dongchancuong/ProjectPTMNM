import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Table from '../../components/table/Table';

const QLHoaDon = ({ title, type }) => {
    return (
        <div className='qlhoadon'>
            <NavBarAdmin title={title} />
            <Table type={type}/>
        </div>
    );
};

export default QLHoaDon
import React, { useState } from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLNhanVien = ({ title, type }) => {


    return (
        <div className='qlnhanvien'>
            <NavBarAdmin title={title} />
            <TableQLNhanVien type={type}/>
        </div>
    );
};




export default QLNhanVien
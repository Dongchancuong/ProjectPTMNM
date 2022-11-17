import React, { useState } from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLNhanVien = ({ title }) => {


    return (
        <div className='qlnhanvien'>
            <NavBarAdmin title={title} />
            <TableQLNhanVien type="qlnhanvien"/>
        </div>
    );
};




export default QLNhanVien
import React, { useState } from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Button from 'react-bootstrap/Button'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';
import ButtonCreate from '../../components/button/ButtonCreate';

const QLNhanVien = ({ title }) => {
    

    return (
        <div className='qlnhanvien'>
            <NavBarAdmin title={title} />
            <TableQLNhanVien />
        </div>
    );
};




export default QLNhanVien
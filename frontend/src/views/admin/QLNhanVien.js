import React, { useState } from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Button from 'react-bootstrap/Button'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLNhanVien = ({ title }) => {
    return (
        <div className='qlnhanvien'>
            <NavBarAdmin title={title} />
            <div className='container'>
                <Button variant="outline-primary" className="fs-5">Thêm nhân viên</Button>
            </div>
            <TableQLNhanVien />
        </div>
    );
};

export default QLNhanVien
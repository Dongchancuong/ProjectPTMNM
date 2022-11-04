import React, { useState } from 'react'
import Button from 'react-bootstrap/Button'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLNhanVien = () => {
    const [show, setShow] = useState(false)
    const handleClose = () => setShow(false)
    const handleShow = () => setShow(true)

    return (
        <div className='qlnhanvien'>
            <div className='container'>
                <Button variant="primary" className="fs-5" onClick={handleShow}>Thêm</Button>
                <Button variant="success" className="fs-5" onClick={handleShow}>Sửa</Button>
            </div>
            <TableQLNhanVien />
        </div>
    );
};

export default QLNhanVien
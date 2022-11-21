import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import FormQLChucVu from '../form/FormQLChucVu';

const ButtonChucVu = ({ value, type, idtaikhoan }) => {
    const [show, setShow] = useState(false);
    const handleShow = () => setShow(true);

    return (
        <>
            <Button variant="secondary" onClick={handleShow}>
                Chỉnh sửa quyền
            </Button>
            <FormQLChucVu value={value} type={"view"} show={show} setshow={setShow} idtaikhoan={idtaikhoan} />
        </>
    );
}

export default ButtonChucVu
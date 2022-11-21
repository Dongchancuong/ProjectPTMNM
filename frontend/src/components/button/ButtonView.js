import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import FormQLNhanVien from '../form/FormQLNhanVien';
import FormQLKhachHang from '../form/FormQLKhachHang';

const ButtonView = ({ value, type, idtaikhoan }) => {
    const [show, setShow] = useState(false);
    const handleShow = () => setShow(true);

    return (
        <>
            <Button variant="secondary" onClick={handleShow}>
                Xem
            </Button>
            {type === "qlnhanvien" ? <FormQLNhanVien value={value} type={"view"} show={show} setshow={setShow} idtaikhoan={idtaikhoan} />
                : type === "qlkhachhang" ? <FormQLKhachHang value={value} type={"view"} show={show} setshow={setShow} />
                    : null}
        </>
    );
}

export default ButtonView
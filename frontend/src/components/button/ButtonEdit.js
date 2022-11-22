import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import FormQLNhanVien from '../form/FormQLNhanVien'
import FormQLKhachHang from '../form/FormQLKhachHang';
import FormQLTaiKhoan from '../form/FormQLTaiKhoan';

const ButtonEdit = ({ value, type, idtaikhoan, idchucvu }) => {
    const [show, setShow] = useState(false);
    const handleShow = () => setShow(true);

    console.log("Button Edit>>>>", value)

    return (
        <>
            <Button variant="primary" onClick={handleShow}>
                Sửa
            </Button>

            {type === "qltaikhoan" ? <FormQLTaiKhoan value={value} type={"edit"} show={show} setshow={setShow} idchucvu={idchucvu}/>
                : type === "qlnhanvien" ? <FormQLNhanVien value={value} type={"edit"} show={show} setshow={setShow} idtaikhoan={idtaikhoan} />
                    : type === "qlkhachhang" ? <FormQLKhachHang value={value} type={"edit"} show={show} setshow={setShow} />
                        : null}
        </>
    );
}

export default ButtonEdit
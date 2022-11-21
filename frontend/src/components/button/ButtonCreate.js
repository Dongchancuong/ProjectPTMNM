import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import FormQLNhanVien from '../form/FormQLNhanVien'
import FormQLKhachHang from '../form/FormQLKhachHang';

const ButtonCreate = ({ type, lastid, idtaikhoan }) => {
    const [show, setShow] = useState(false);
    const handleShow = () => setShow(true);

    return (
        <>
            <Button variant="outline-primary" className="fs-5 fw-bold" onClick={handleShow}>
                Thêm {type === "qlchucvu" ? "chức vụ"
                    : type === "qltaikhoan" ? "tài khoản"
                        : type === "qlnhanvien" ? "nhân viên"
                            : type === "qlkhachhang" ? "khách hàng"
                                : type === "qlhoadon" ? "hóa đơn"
                                    : null}
            </Button>

            {type === "qlnhanvien" ? <FormQLNhanVien type={"create"} show={show} setshow={setShow} lastid={lastid} idtaikhoan={idtaikhoan}/>
                : type === "qlkhachhang" ? <FormQLKhachHang type={"create"} show={show} setshow={setShow} />
                    : null}
        </>
    );
}

export default ButtonCreate
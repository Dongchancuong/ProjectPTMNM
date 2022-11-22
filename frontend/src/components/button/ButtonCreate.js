import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import FormQLNhanVien from '../form/FormQLNhanVien'
import FormQLKhachHang from '../form/FormQLKhachHang';
import FormQLTaiKhoan from '../form/FormQLTaiKhoan';
import FormQLCTKM from '../form/FormQLCTKM';

const ButtonCreate = ({ type, getnewid, idtaikhoan, idchucvu }) => {
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
                                    : type === "qlctkm" ? "C.T.K.M"
                                        : null}
            </Button>

            {type === "qltaikhoan" ? <FormQLTaiKhoan type={"create"} show={show} setshow={setShow} idchucvu={idchucvu} />
                : type === "qlnhanvien" ? <FormQLNhanVien type={"create"} show={show} setshow={setShow} lastid={getnewid} idtaikhoan={idtaikhoan} />
                    : type === "qlkhachhang" ? <FormQLKhachHang type={"create"} show={show} setshow={setShow} />
                        : type === "qlctkm" ? <FormQLCTKM type={"create"} show={show} setshow={setShow} />
                            : null}
        </>
    );
}

export default ButtonCreate
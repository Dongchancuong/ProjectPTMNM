import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import Moment from 'moment';//format tiền VNĐ
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
            {/* <Modal show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Thêm thông tin nhân viên</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Form>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>ID Nhân Viên</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder="Nhập ID nhân viên"
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>ID Tài Khoản</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder="Chọn ID tài khoản"
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Họ và tên</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder="Nhập họ và tên"
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Giới tính</Form.Label>
                            <Form.Select aria-label="Default select example">
                                <option>Chọn giới tính</option>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </Form.Select>
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Ngày sinh</Form.Label>
                            <Form.Control
                                type="date"
                                placeholder="Nhập ngày sinh"
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Số điện thoại</Form.Label>
                            <Form.Control
                                type="number"
                                placeholder="Nhập số điện thoại"
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Địa chỉ</Form.Label>
                            <Form.Control
                                as="textarea"
                                placeholder="Nhập địa chỉ"
                                rows={2}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Ngày vào làm</Form.Label>
                            <Form.Control
                                type="date"
                                placeholder="Nhập ngày vào làm"
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Lương</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder="Nhập lương"
                                onChange={dinhDangVND}
                                // defaultValue={new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.luong)}
                            />
                        </Form.Group>
                    </Form>
                </Modal.Body>
                <Modal.Footer>
                    <Button variant="secondary" onClick={handleClose}>
                        Đóng
                    </Button>
                    <Button variant="primary" onClick={handleClose}>
                        Lưu
                    </Button>
                </Modal.Footer>
            </Modal> */}
        </>
    );
}

export default ButtonCreate
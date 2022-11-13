import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import Moment from 'moment';//format tiền VNĐ

const ButtonView = ({ value }) => {
    const [show, setShow] = useState(false);

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);

    console.log("Value bên button View: ", value)

    return (
        <>
            <Button variant="secondary" onClick={handleShow}>
                Xem
            </Button>

            <Modal show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Xem thông tin nhân viên</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Form>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>ID Nhân Viên</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                value={value.idnhanvien}
                                autoFocus
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>ID Tài Khoản</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                value={value.idtaikhoan}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Họ và tên</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                value={value.hoten}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Giới tính</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                value={value.gioitinh === 1 ? "Nam" : "Nữ"}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Ngày sinh</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                value={Moment(value.ngaysinh).format('DD-MM-YYYY')}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Số điện thoại</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                value={value.sdt}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Địa chỉ</Form.Label>
                            <Form.Control
                                type="textarea"
                                rows={2}
                                value={value.diachi}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Email</Form.Label>
                            <Form.Control
                                type="email"
                                placeholder=""
                                value={value.email}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Ngày vào làm</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                value={Moment(value.ngayvaolam).format('DD-MM-YYYY')}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Lương</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                value={ new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.luong) }
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
            </Modal>
        </>
    );
}

export default ButtonView
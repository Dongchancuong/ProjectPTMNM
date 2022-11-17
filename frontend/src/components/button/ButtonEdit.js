import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import Moment from 'moment';//format tiền VNĐ
import FormQLNhanVien from '../form/FormQLNhanVien'

const ButtonEdit = ({ value }) => {
    const [show, setShow] = useState(false);
    const handleShow = () => setShow(true);

    return (
        <>
            <Button variant="primary" onClick={handleShow}>
                Sửa
            </Button>

            <FormQLNhanVien value={value} type={"edit"} show={show} setshow={setShow} />

            {/* <Modal show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Sửa thông tin nhân viên</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Form>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>ID Nhân Viên</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                defaultValue={value.idnhanvien}
                                readOnly
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>ID Tài Khoản</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                defaultValue={value.idtaikhoan}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Họ và tên</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                defaultValue={value.hoten}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Giới tính</Form.Label>
                            <Form.Select aria-label="Default select example" defaultValue={value.gioitinh}>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </Form.Select>
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Ngày sinh</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                defaultValue={Moment(value.ngaysinh).format('DD/MM/YYYY')}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Số điện thoại</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                defaultValue={value.sdt}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Địa chỉ</Form.Label>
                            <Form.Control
                                as="textarea"
                                rows={2}
                                defaultValue={value.diachi}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Ngày vào làm</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                defaultValue={Moment(value.ngayvaolam).format('DD/MM/YYYY')}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                            <Form.Label>Lương</Form.Label>
                            <Form.Control
                                type="text"
                                placeholder=""
                                // new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.luong)
                                defaultValue={value.luong}
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

export default ButtonEdit
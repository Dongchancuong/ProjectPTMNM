import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import Moment from 'moment';//format tiền VNĐ

const FormQLKhachHang = (props) => {
    const handleClose = () => props.setshow(false)

    return (
        <>
            {props.type === "delete"
                ? <Modal show={props.show} onHide={handleClose} animation={false} centered>
                    <Modal.Header closeButton>
                        <Modal.Title>Xóa khách hàng</Modal.Title>
                    </Modal.Header>
                    <Modal.Body>Bạn có chắc muốn xóa khách hàng <b>{props.value.idkhachhang} - {props.value.hoten}</b>?</Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>
                            Đóng
                        </Button>
                        <Button variant="primary" onClick={handleClose}>
                            Xác nhận
                        </Button>
                    </Modal.Footer>
                </Modal>
                : <Modal show={props.show} onHide={handleClose}>
                    <Modal.Header closeButton>
                        <Modal.Title>{props.type === "create" ? "Thêm"
                            : props.type === "edit" ? "Sửa"
                                : props.type === "view" ? "Xem"
                                    : null} thông tin khách hàng
                        </Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        <Form>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Khách hàng</Form.Label>
                                <Form.Control
                                    type="text"
                                    placeholder="Nhập ID khách hàng"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.idkhachhang : null}
                                    readOnly={props.type === "edit" || props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Tài Khoản</Form.Label>
                                <Form.Control
                                    type="text"
                                    placeholder="Chọn ID tài khoản"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.idtaikhoan : null}
                                    readOnly={props.type === "edit" || props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Họ và tên</Form.Label>
                                <Form.Control
                                    type="text"
                                    placeholder="Nhập họ và tên"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.hoten : null}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Email</Form.Label>
                                <Form.Control
                                    type="email"
                                    placeholder="Nhập email"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.email : null}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Số điện thoại</Form.Label>
                                <Form.Control
                                    type="number"
                                    placeholder="Nhập số điện thoại"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.sdt : null}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Địa chỉ</Form.Label>
                                <Form.Control
                                    as="textarea"
                                    placeholder="Nhập địa chỉ"
                                    rows={2}
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.diachi : null}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            {props.type === "create" || props.type === "edit"
                                ? null
                                : <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                    <Form.Label>Ngày tạo</Form.Label>
                                    <Form.Control
                                        type={props.type === "create" ? "date" : "text"}
                                        placeholder="Nhập ngày vào làm"
                                        defaultValue={props.type === "create" ? null : Moment(props.type === "edit" || props.type === "view" ? props.value.create_at : null).format('DD/MM/YYYY')}
                                        readOnly={props.type === "view" ? true : false}
                                    />
                                </Form.Group>
                            }
                        </Form>
                    </Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>Đóng</Button>
                        {props.type === "edit" || props.type === "create"
                            ? <Button variant="primary" onClick={handleClose}>Lưu</Button>
                            : null
                        }
                        {/* <Button variant="primary" onClick={handleClose}>
                        Lưu
                    </Button> */}
                    </Modal.Footer>
                </Modal>}
        </>
    );
}

export default FormQLKhachHang
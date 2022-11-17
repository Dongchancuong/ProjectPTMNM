import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import Moment from 'moment';//format tiền VNĐ

const FormQLNhanVien = (props) => {

    console.log(props)

    const handleClose = () => props.setshow(false)

    return (
        <>
            {props.type === "delete"
                ? <Modal show={props.show} onHide={handleClose} animation={false} centered>
                    <Modal.Header closeButton>
                        <Modal.Title>Xóa nhân viên</Modal.Title>
                    </Modal.Header>
                    <Modal.Body>Bạn có chắc muốn xóa nhân viên <b>{props.value.idnhanvien} - {props.value.hoten}</b>?</Modal.Body>
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
                                    : null} thông tin nhân viên
                        </Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        <Form>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Nhân Viên</Form.Label>
                                <Form.Control
                                    type="text"
                                    placeholder="Nhập ID nhân viên"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.idnhanvien : null}
                                    readOnly={props.type === "edit" || props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                {/* Lưu ý nhớ tải dữ liệu tài khoản lên */}
                                <Form.Label>ID Tài Khoản</Form.Label>
                                <Form.Control
                                    type="text"
                                    placeholder="Chọn ID tài khoản"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.idtaikhoan : null}
                                    readOnly={props.type === "view" ? true : false}
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
                                <Form.Label>Giới tính</Form.Label>
                                <Form.Select aria-label="Default select example" defaultValue={props.type === "edit" || props.type === "view" ? props.value.gioitinh : null}>
                                    <option value="-1">Chọn giới tính</option>
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </Form.Select>
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Ngày sinh</Form.Label>
                                <Form.Control
                                    type={props.type === "create" ? "date" : "text"}
                                    placeholder="Nhập ngày sinh"
                                    defaultValue={props.type === "create" ? null : Moment(props.type === "edit" || props.type === "view" ? props.value.ngaysinh : null).format('DD/MM/YYYY')}
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
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Ngày vào làm</Form.Label>
                                <Form.Control
                                    type={props.type === "create" ? "date" : "text"}
                                    placeholder="Nhập ngày vào làm"
                                    defaultValue={props.type === "create" ? null : Moment(props.type === "edit" || props.type === "view" ? props.value.ngayvaolam : null).format('DD/MM/YYYY')}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Lương</Form.Label>
                                <Form.Control
                                    type="text"
                                    placeholder="Nhập lương"
                                    // new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.luong)
                                    defaultValue={props.type === "edit" ? props.value.luong : props.type === "view" ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(props.value.luong) : null}
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

export default FormQLNhanVien
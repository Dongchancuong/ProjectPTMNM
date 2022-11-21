import React, { useState, useEffect } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import Moment from 'moment';//format tiền VNĐ
import axios from 'axios';

const FormQLNhanVien = (props) => {

    console.log("ID tai khoan: ", props.idtaikhoan)

    const [idnhanvien, setIdnhanvien] = useState(props.lastid)
    const [idtaikhoan, setIdtaikhoan] = useState(null)
    const [hoten, setHoten] = useState(null)
    const [email, setEmail] = useState(null)
    const [gioitinh, setGioitinh] = useState(null)
    const [ngaysinh, setNgaysinh] = useState(null)
    const [sdt, setSdt] = useState(null)
    const [diachi, setDiachi] = useState(null)
    const [ngayvaolam, setNgayvaolam] = useState(null)
    const [luong, setLuong] = useState(null)

    const [listnv, setListnv] = useState()

    const handleClose = () => props.setshow(false)

    //Luu nhan vien
    const saveNV = async (e) => {
        e.preventDefault()

        setListnv([{
            idnhanvien: props.lastid,
            idtaikhoan: idtaikhoan,
            hoten: hoten,
            email: email,
            gioitinh: gioitinh,
            ngaysinh: ngaysinh,
            sdt: sdt,
            diachi: diachi,
            ngayvaolam: ngayvaolam,
            luong: luong
        }])

        console.log(listnv[0])
        let res = await axios.post('http://localhost:8000/api/nv/add', listnv[0])
        console.log(res.data.status)
        if (res.data.status === 201) {
            // console.log(res.data.message)
            setIdtaikhoan(null)
            setHoten(null)
            setEmail(null)
            setGioitinh(null)
            setNgaysinh(null)
            setSdt(null)
            setDiachi(null)
            setNgayvaolam(null)
            setLuong(null)
        }
    }

    const inputIdtaikhoan = (e) => {
        e.preventDefault()
        setIdtaikhoan(e.target.value)
        console.log(idtaikhoan)
    }
    const inputHoten = (e) => {
        e.preventDefault()
        setHoten(e.target.value)
        console.log(hoten)
    }
    const inputEmail = (e) => {
        e.preventDefault()
        setEmail(e.target.value)
        console.log(email)
    }
    const inputGioitinh = (e) => {
        e.preventDefault()
        setGioitinh(e.target.value)
        console.log(gioitinh)
    }
    const inputNgaysinh = (e) => {
        e.preventDefault()
        setNgaysinh(e.target.value)
        console.log(ngaysinh)
    }
    const inputSdt = (e) => {
        e.preventDefault()
        setSdt(e.target.value)
        console.log(sdt)
    }
    const inputDiachi = (e) => {
        e.preventDefault()
        setDiachi(e.target.value)
        console.log(diachi)
    }
    const inputNgayvaolam = (e) => {
        e.preventDefault()
        setNgayvaolam(e.target.value)
        console.log(ngayvaolam)
    }
    const inputLuong = (e) => {
        e.preventDefault()
        setLuong(e.target.value)
        console.log(luong)
    }


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
                                    name="idnhanvien"
                                    placeholder="Nhập ID nhân viên"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.idnhanvien : props.type === "create" ? props.lastid : idnhanvien}
                                    readOnly={props.type === "edit" || props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Tài Khoản</Form.Label>
                                <Form.Select aria-label="Default select example"
                                    name="idtaikhoan"
                                    value={props.type === "edit" || props.type === "view" ? props.value.idtaikhoan : idtaikhoan}
                                    onChange={inputIdtaikhoan}
                                >
                                    <option value="-1">Chọn ID Tài Khoản</option>
                                    {/* {console.log("Idtaikhoan: ", props.idtaikhoan)} */}
                                    {props.idtaikhoan ? props.idtaikhoan.map((item, index) =>
                                        <option key={index} value={item.idtaikhoan}>{item.idtaikhoan}</option>
                                    ) : null}

                                </Form.Select>
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Họ và tên</Form.Label>
                                <Form.Control
                                    type="text"
                                    name="hoten"
                                    placeholder="Nhập họ và tên"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.hoten : hoten}
                                    onChange={inputHoten}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Email</Form.Label>
                                <Form.Control
                                    type="email"
                                    name="email"
                                    placeholder="Nhập email"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.email : email}
                                    onChange={inputEmail}
                                    // value={field.email}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Giới tính</Form.Label>
                                <Form.Select aria-label="Default select example"
                                    name="gioitinh"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.gioitinh : gioitinh}
                                    // value={field.gioitinh}
                                    onChange={inputGioitinh}
                                >
                                    <option value="-1">Chọn giới tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </Form.Select>
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Ngày sinh</Form.Label>
                                <Form.Control
                                    type={props.type === "create" ? "date" : "text"}
                                    name="ngaysinh"
                                    placeholder="Nhập ngày sinh"
                                    defaultValue={props.type === "create" ? ngaysinh : Moment(props.type === "edit" || props.type === "view" ? props.value.ngaysinh : null).format('DD/MM/YYYY')}
                                    onChange={inputNgaysinh}
                                    // value={field.ngaysinh}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Số điện thoại</Form.Label>
                                <Form.Control
                                    type="number"
                                    name="sdt"
                                    placeholder="Nhập số điện thoại"
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.sdt : sdt}
                                    onChange={inputSdt}
                                    // value={field.sdt}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Địa chỉ</Form.Label>
                                <Form.Control
                                    as="textarea"
                                    name="diachi"
                                    placeholder="Nhập địa chỉ"
                                    rows={2}
                                    defaultValue={props.type === "edit" || props.type === "view" ? props.value.diachi : diachi}
                                    onChange={inputDiachi}
                                    // value={field.diachi}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Ngày vào làm</Form.Label>
                                <Form.Control
                                    type={props.type === "create" ? "date" : "text"}
                                    name="ngayvaolam"
                                    placeholder="Nhập ngày vào làm"
                                    defaultValue={props.type === "create" ? null : Moment(props.type === "edit" || props.type === "view" ? props.value.ngayvaolam : ngayvaolam).format('DD/MM/YYYY')}
                                    onChange={inputNgayvaolam}
                                    // value={field.ngayvaolam}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Lương</Form.Label>
                                <Form.Control
                                    type="text"
                                    name="luong"
                                    placeholder="Nhập lương"
                                    // new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.luong)
                                    defaultValue={props.type === "edit" ? props.value.luong : props.type === "view" ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(props.value.luong) : luong}
                                    onChange={inputLuong}
                                    // value={field.luong}
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
                            ? <Button variant="primary" onClick={saveNV}>Lưu</Button>//
                            : null
                        }
                    </Modal.Footer>
                </Modal>}
        </>
    );
}

export default FormQLNhanVien
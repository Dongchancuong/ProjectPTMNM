import React, { useState, useEffect } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import Moment from 'moment';//format tiền VNĐ
import axios from 'axios';

const FormQLNhanVien = (props) => {

    console.log("ID tai khoan: ", props)

    const [idnhanvien, setIdnhanvien] = useState(props.type === "edit" || props.type === "view" ? props.value.idnhanvien : props.type === "create" ? props.lastid : null)
    const [idtaikhoan, setIdtaikhoan] = useState(props.type === "edit" || props.type === "view" ? props.value.idtaikhoan : null)
    const [hoten, setHoten] = useState(props.type === "edit" || props.type === "view" ? props.value.hoten : null)
    const [email, setEmail] = useState(props.type === "edit" || props.type === "view" ? props.value.email : null)
    const [gioitinh, setGioitinh] = useState(props.type === "edit" || props.type === "view" ? props.value.gioitinh : null)
    const [ngaysinh, setNgaysinh] = useState(props.type === "edit" || props.type === "view" ? props.value.ngaysinh : null)
    const [sdt, setSdt] = useState(props.type === "edit" || props.type === "view" ? props.value.sdt : null)
    const [diachi, setDiachi] = useState(props.type === "edit" || props.type === "view" ? props.value.diachi : null)
    const [ngayvaolam, setNgayvaolam] = useState(props.type === "edit" || props.type === "view" ? props.value.ngayvaolam : null)
    const [luong, setLuong] = useState(props.type === "edit" ? props.value.luong : props.type === "view" ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(props.value.luong) : null)

    const [listnv, setListnv] = useState([{
        idnhanvien: props.type === "create" ? props.lastid : idnhanvien,
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

    const handleClose = () => props.setshow(false)

    const setListNhanVien = () => setListnv([{//set dinh dang list nhan vien
        idnhanvien: props.type === "create" ? props.lastid : idnhanvien,
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
    //Luu nhan vien
    const saveCreateNV = async (e) => {
        e.preventDefault()

        setListNhanVien()

        console.log(listnv[0])
        let res = await axios.post('http://localhost:8000/api/nv/add', listnv[0])
        if (res.data.status === true) {
            setIdtaikhoan(null)
            setHoten(null)
            setEmail(null)
            setGioitinh(null)
            setNgaysinh(null)
            setSdt(null)
            setDiachi(null)
            setNgayvaolam(null)
            setLuong(null)
            handleClose()
        }
    }

    const saveEditNV = async (e) => {
        e.preventDefault()
        setListNhanVien()
        console.log(listnv)
        if (listnv === undefined) { }
        else {
            console.log("Edit list>>>", listnv[0])
            let res = await axios.put('http://localhost:8000/api/nv/update', listnv[0])
            console.log(res.data.status)
            if (res.data.status === true) {
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
                handleClose()
            }
        }
    }

    const saveDeleteNV = async (e) => {
        e.preventDefault()
        console.log(props.value.idnhanvien)
        let res = await axios.delete(`http://localhost:8000/api/nv/delete/${props.value.idnhanvien}`)
        if (res.data.status === true) {
            handleClose()
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
                        <Button variant="primary" onClick={saveDeleteNV}>
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
                                    defaultValue={props.type === "create" ? props.lastid : idnhanvien}
                                    readOnly
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Tài Khoản</Form.Label>
                                <Form.Select aria-label="Default select example"
                                    name="idtaikhoan"
                                    value={idtaikhoan}
                                    onChange={inputIdtaikhoan}
                                >
                                    <option value="-1">Chọn ID Tài Khoản</option>
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
                                    defaultValue={hoten}
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
                                    defaultValue={email}
                                    onChange={inputEmail}
                                    // value={field.email}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Giới tính</Form.Label>
                                <Form.Select aria-label="Default select example"
                                    name="gioitinh"
                                    defaultValue={gioitinh}
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
                                    defaultValue={sdt}
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
                                    defaultValue={diachi}
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
                                    defaultValue={luong}
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
                                        placeholder="Nhập tạo"
                                        defaultValue={props.type === "create" ? null : Moment(props.type === "edit" || props.type === "view" ? props.value.create_at : null).format('DD/MM/YYYY')}
                                        readOnly={props.type === "view" ? true : false}
                                    />
                                </Form.Group>
                            }
                        </Form>
                    </Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>Đóng</Button>
                        {props.type === "create" ? <Button variant="primary" onClick={saveCreateNV}>Lưu</Button>
                            : props.type === "edit" ? <Button variant="primary" onClick={saveEditNV}>Lưu</Button>
                                : null
                        }
                    </Modal.Footer>
                </Modal>}
        </>
    );
}

export default FormQLNhanVien
import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import Moment from 'moment';//format tiền VNĐ
import axios from 'axios';

const FormQLKhachHang = (props) => {
    const [idkhachhang, setIdkhachhang] = useState(props.type === "edit" || props.type === "view" ? props.value.idkhachhang : null)
    const [idtaikhoan, setIdtaikhoan] = useState(props.type === "edit" || props.type === "view" ? props.value.idtaikhoan : null)
    const [hoten, setHoten] = useState(props.type === "edit" || props.type === "view" ? props.value.hoten : null)
    const [email, setEmail] = useState(props.type === "edit" || props.type === "view" ? props.value.email : null)
    const [tichluy, setTichluy] = useState(props.type === "edit" ? props.value.tichluy : props.type === "view" ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(props.value.tichluy) : null)
    const [sdt, setSdt] = useState(props.type === "edit" || props.type === "view" ? props.value.sdt : null)
    const [diachi, setDiachi] = useState(props.type === "edit" || props.type === "view" ? props.value.diachi : null)
    const [capdo, setCapdo] = useState(props.type === "edit" || props.type === "view" ? props.value.capdo : null)

    const [listkh, setListkh] = useState([{
        idkhachhang: idkhachhang,
        idtaikhoan: idtaikhoan,
        hoten: hoten,
        email: email,
        sdt: sdt,
        diachi: diachi,
        tichluy: tichluy,
        capdo: capdo
    }])

    const handleClose = () => props.setshow(false)

    const setListKhachHang = () => setListkh([{//set dinh dang list nhan vien
        idkhachhang: idkhachhang,
        idtaikhoan: idtaikhoan,
        hoten: hoten,
        email: email,
        sdt: sdt,
        diachi: diachi,
        tichluy: tichluy,
        capdo: capdo
    }])
    //Luu khach hang
    // const saveCreateNV = async (e) => {
    //     e.preventDefault()
    //     setListKhachHang()
    //     if (listkh === undefined) { }
    //     else {
    //         let res = await axios.post('http://localhost:8000/api/kh/add', listkh[0])
    //         if (res.data.status === true) {
    //             setIdkhachhang(null)
    //             setIdtaikhoan(null)
    //             setHoten(null)
    //             setEmail(null)
    //             setSdt(null)
    //             setDiachi(null)
    //             setTichluy(null)
    //             setCapdo(null)
    //             handleClose()
    //         }
    //     }
    // }

    const saveEditKH = async (e) => {
        e.preventDefault()
        setListKhachHang()
        if (listkh === undefined) { }
        else {
            let res = await axios.put('http://localhost:8000/api/kh/update', listkh[0])
            if (res.data.status === true) {
                setIdkhachhang(null)
                setIdtaikhoan(null)
                setHoten(null)
                setEmail(null)
                setSdt(null)
                setDiachi(null)
                setTichluy(null)
                setCapdo(null)
                handleClose()
            }
        }
    }

    const saveDeleteKH = async (e) => {
        e.preventDefault()
        let res = await axios.delete(`http://localhost:8000/api/kh/delete/${props.value.idkhachhang}`)
        if (res.data.status === true) {
            handleClose()
        }
    }

    const inputIdtaikhoan = (e) => {
        e.preventDefault()
        setIdtaikhoan(e.target.value)
    }
    const inputHoten = (e) => {
        e.preventDefault()
        setHoten(e.target.value)
    }
    const inputEmail = (e) => {
        e.preventDefault()
        setEmail(e.target.value)
    }
    const inputSdt = (e) => {
        e.preventDefault()
        setSdt(e.target.value)
    }
    const inputDiachi = (e) => {
        e.preventDefault()
        setDiachi(e.target.value)
    }
    const inputTichluy = (e) => {
        e.preventDefault()
        setTichluy(e.target.value)
    }
    const inputCapdo = (e) => {
        e.preventDefault()
        setCapdo(e.target.value)
    }

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
                        <Button variant="primary" onClick={saveDeleteKH}>
                            Xác nhận
                        </Button>
                    </Modal.Footer>
                </Modal>
                : <Modal show={props.show} onHide={handleClose}>
                    <Modal.Header closeButton>
                        <Modal.Title>{props.type === "edit" ? "Sửa"
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
                                    name="idkhachhang"
                                    placeholder="Nhập ID khách hàng"
                                    defaultValue={idkhachhang}
                                    readOnly
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Tài Khoản</Form.Label>
                                {props.type === "view"
                                    ? <Form.Control
                                        type="text"
                                        defaultValue={idtaikhoan}
                                        readOnly
                                    />
                                    : <Form.Select aria-label="Default select example"
                                        name="idtaikhoan"
                                        value={idtaikhoan}
                                        onChange={inputIdtaikhoan}
                                    >
                                        <option value="-1">Chọn ID Tài Khoản</option>
                                        {props.idtaikhoan ? props.idtaikhoan.map((item, index) =>
                                            <option key={index} value={item.idtaikhoan}>{item.idtaikhoan}</option>
                                        ) : null}

                                    </Form.Select>
                                }
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
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Tích lũy</Form.Label>
                                <Form.Control
                                    type="text"
                                    name="tichluy"
                                    placeholder="Nhập tích lũy"
                                    defaultValue={tichluy}
                                    onChange={inputTichluy}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Cấp độ</Form.Label>
                                <Form.Select aria-label="Default select example"
                                    name="capdo"
                                    value={capdo}
                                    onChange={inputCapdo}
                                >
                                    <option value="-1">Chọn cấp độ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </Form.Select>
                            </Form.Group>
                            {props.type === "edit"
                                ? null
                                : <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                    <Form.Label>Ngày tạo</Form.Label>
                                    <Form.Control
                                        type={"text"}
                                        placeholder="Nhập tạo"
                                        defaultValue={Moment(props.type === "edit" || props.type === "view" ? props.value.create_at : null).format('DD/MM/YYYY')}
                                        readOnly={props.type === "view" ? true : false}
                                    />
                                </Form.Group>
                            }
                        </Form>
                    </Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>Đóng</Button>
                        {props.type === "edit"
                            ? <Button variant="primary" onClick={saveEditKH}>Lưu</Button>
                            : null
                        }
                    </Modal.Footer>
                </Modal>}
        </>
    );
}

export default FormQLKhachHang
import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import axios from 'axios';

const FormQLTaiKhoan = (props) => {

    const [idtaikhoan, setIdtaikhoan] = useState(props.type === "edit" ? props.value.idtaikhoan : null)
    const [idchucvu, setChucvu] = useState(props.type === "edit" ? props.value.idchucvu : null)
    const [tentaikhoan, setTentaikhoan] = useState(props.type === "edit" ? props.value.tentaikhoan : null)
    const [matkhau, setMatkhau] = useState(props.type === "edit" ? props.value.matkhau : null)

    const [listtk, setListtk] = useState([{
        idtaikhoan: props.type === "edit" ? props.value.idtaikhoan : null,
        idchucvu: props.type === "edit" ? props.value.idchucvu : null,
        tentaikhoan: props.type === "edit" ? props.value.tentaikhoan : null,
        matkhau: props.type === "edit" ? props.value.matkhau : null
    }])

    const handleClose = () => props.setshow(false)

    const setListTaiKhoan = () => setListtk([{//set dinh dang list tai khoan
        idtaikhoan: idtaikhoan,
        idchucvu: idchucvu,
        tentaikhoan: tentaikhoan,
        matkhau: matkhau
    }])

    //Luu nhan vien
    const saveCreateTK = async (e) => {
        e.preventDefault()
        setListTaiKhoan()
        let res = await axios.post('http://localhost:8000/api/tk/add', listtk[0])
        if (res.data.status === true) {
            setChucvu(null)
            setTentaikhoan(null)
            setMatkhau(null)
            handleClose()
        }
    }

    const saveEditTK = async (e) => {
        e.preventDefault()
        setListTaiKhoan()
        if (listtk === undefined) { }
        else {
            console.log("Edit list>>>", listtk[0])
            let res = await axios.put('http://localhost:8000/api/tk/update', listtk[0])
            console.log(res.data.status)
            if (res.data.status === true) {
                // console.log(res.data.message)
                setChucvu(null)
                setTentaikhoan(null)
                setMatkhau(null)
                handleClose()
            }
        }
    }

    const saveDeleteTK = async (e) => {
        e.preventDefault()
        let res = await axios.delete(`http://localhost:8000/api/tk/delete/${props.value.idtaikhoan}`)
        if (res.data.status === true) {
            handleClose()
        }
    }

    const inputIdchucvu = (e) => {
        e.preventDefault()
        setChucvu(e.target.value)
    }
    const inputTentaikhoan = (e) => {
        e.preventDefault()
        setTentaikhoan(e.target.value)
    }
    const inputMatkhau = (e) => {
        e.preventDefault()
        setMatkhau(e.target.value)
    }

    return (
        <>
            {props.type === "delete"
                ? <Modal show={props.show} onHide={handleClose} animation={false} centered>
                    <Modal.Header closeButton>
                        <Modal.Title>Xóa tài khoản</Modal.Title>
                    </Modal.Header>
                    <Modal.Body>Bạn có chắc muốn xóa tài khoản <b>{props.value.idtaikhoan} - {props.value.tentaikhoan}</b>?</Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>
                            Đóng
                        </Button>
                        <Button variant="primary" onClick={saveDeleteTK}>
                            Xác nhận
                        </Button>
                    </Modal.Footer>
                </Modal>
                : <Modal show={props.show} onHide={handleClose}>
                    <Modal.Header closeButton>
                        <Modal.Title>{props.type === "create" ? "Thêm"
                            : props.type === "edit" ? "Sửa"
                                : null} thông tin tài khoản
                        </Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        <Form>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Tài khoản</Form.Label>
                                <Form.Control
                                    type="text"
                                    name="idtaikhoan"
                                    placeholder="Nhập ID tài khoản"
                                    defaultValue={idtaikhoan}
                                    readOnly
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Chức vụ</Form.Label>
                                <Form.Select aria-label="Default select example"
                                    name="idchucvu"
                                    value={idchucvu}
                                    onChange={inputIdchucvu}
                                >
                                    <option value="-1">Chọn ID Chức vụ</option>
                                    {props.idchucvu ? props.idchucvu.map((item, index) =>
                                        <option key={index} value={item.idchucvu}>{item.idchucvu}</option>
                                    ) : null}

                                </Form.Select>
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Tên Tài Khoản</Form.Label>
                                <Form.Control
                                    type="text"
                                    name="tentaikhoan"
                                    placeholder="Nhập Tên tài khoản"
                                    onChange={inputTentaikhoan}
                                    defaultValue={tentaikhoan}
                                    readOnly={props.type === "edit" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Mật khẩu</Form.Label>
                                <Form.Control
                                    type="password"
                                    name="matkhau"
                                    placeholder="Nhập mật khẩu"
                                    onChange={inputMatkhau}
                                    defaultValue={matkhau}
                                    readOnly={props.type === "edit" ? true : false}
                                />
                            </Form.Group>
                        </Form>
                    </Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>Đóng</Button>
                        {props.type === "create" ? <Button variant="primary" onClick={saveCreateTK}>Lưu</Button>
                            : props.type === "edit" ? <Button variant="primary" onClick={saveEditTK}>Lưu</Button>
                                : null
                        }
                    </Modal.Footer>
                </Modal>}
        </>
    );
}

export default FormQLTaiKhoan
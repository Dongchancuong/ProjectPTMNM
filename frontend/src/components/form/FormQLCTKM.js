import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Modal from 'react-bootstrap/Modal';
import axios from 'axios';
import Moment from 'moment';

const FormQLCTKM = (props) => {

    const [idkhuyenmai, setKhuyenmai] = useState(props.type === "edit" ? props.value.idkhuyenmai : null)
    const [tenchuongtrinh, setTenchuongtrinh] = useState(props.type === "edit" ? props.value.tenchuongtrinh : null)
    const [giamgia, setGiamgia] = useState(props.type === "edit" ? props.value.giamgia : null)
    const [ngaybatdau, setNgaybatdau] = useState(props.type === "edit" ? props.value.ngaybatdau : null)
    const [ngayketthuc, setNgayketthuc] = useState(props.type === "edit" ? props.value.ngayketthuc : null)

    const [listctkm, setListctkm] = useState([{
        idkhuyenmai: props.type === "edit" ? props.value.idkhuyenmai : null,
        tenchuongtrinh: props.type === "edit" ? props.value.tenchuongtrinh : null,
        giamgia: props.type === "edit" ? props.value.giamgia : null,
        ngaybatdau: props.type === "edit" ? props.value.ngaybatdau : null,
        ngayketthuc: props.type === "edit" ? props.value.ngayketthuc : null
    }])

    const handleClose = () => props.setshow(false)

    const setListCTKM = () => setListctkm([{//set dinh dang list tai khoan
        idkhuyenmai: idkhuyenmai,
        tenchuongtrinh: tenchuongtrinh,
        giamgia: giamgia,
        ngaybatdau: ngaybatdau,
        ngayketthuc: ngayketthuc
    }])

    const saveCreateCTKM = async (e) => {
        e.preventDefault()
        setListCTKM()
        if (listctkm === undefined) { }
        else {
            let res = await axios.post('http://localhost:8000/api/ctkm/add', listctkm[0])
            if (res.data.status === true) {
                setKhuyenmai(null)
                setTenchuongtrinh(null)
                setGiamgia(null)
                setNgaybatdau(null)
                setNgayketthuc(null)
                handleClose()
            }
        }
    }

    const saveEditCTKM = async (e) => {
        e.preventDefault()
        setListCTKM()
        if (listctkm === undefined) { }
        else {
            let res = await axios.put(`http://localhost:8000/api/ctkm/update/${props.value.idkhuyenmai}`, listctkm[0])
            console.log(res.data.status)
            if (res.data.status === true) {
                setKhuyenmai(null)
                setTenchuongtrinh(null)
                setGiamgia(null)
                setNgaybatdau(null)
                setNgayketthuc(null)
                handleClose()
            }
        }
    }

    const saveDeleteCTKM = async (e) => {
        e.preventDefault()
        let res = await axios.delete(`http://localhost:8000/api/ctkm/delete/${props.value.idkhuyenmai}`)
        if (res.data.status === true) {
            handleClose()
        }
    }

    const inputIdkhuyenmai = (e) => {
        e.preventDefault()
        setKhuyenmai(e.target.value)
    }
    const inputTenchuongtrinh = (e) => {
        e.preventDefault()
        setTenchuongtrinh(e.target.value)
    }
    const inputGiamgia = (e) => {
        e.preventDefault()
        setGiamgia(e.target.value)
    }
    const inputNgaybatdau = (e) => {
        e.preventDefault()
        setNgaybatdau(e.target.value)
    }
    const inputNgayketthuc = (e) => {
        e.preventDefault()
        setNgayketthuc(e.target.value)
    }

    return (
        <>
            {props.type === "delete"
                ? <Modal show={props.show} onHide={handleClose} animation={false} centered>
                    <Modal.Header closeButton>
                        <Modal.Title>Xóa khuyến mãi</Modal.Title>
                    </Modal.Header>
                    <Modal.Body>Bạn có chắc muốn xóa khuyến mãi <b>{props.value.idkhuyenmai} - {props.value.tenchuongtrinh}</b>?</Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>
                            Đóng
                        </Button>
                        <Button variant="primary" onClick={saveDeleteCTKM}>
                            Xác nhận
                        </Button>
                    </Modal.Footer>
                </Modal>
                : <Modal show={props.show} onHide={handleClose}>
                    <Modal.Header closeButton>
                        <Modal.Title>{props.type === "create" ? "Thêm"
                            : props.type === "edit" ? "Sửa"
                                : null} thông tin khuyến mãi
                        </Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        <Form>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>ID Khuyến Mãi</Form.Label>
                                <Form.Control
                                    type="text"
                                    name="idkhuyenmai"
                                    placeholder="Nhập ID khuyến mãi"
                                    onChange={inputIdkhuyenmai}
                                    defaultValue={idkhuyenmai}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Tên Chương Trình</Form.Label>
                                <Form.Control
                                    type="text"
                                    name="tenchuongtrinh"
                                    placeholder="Nhập Tên chương trình"
                                    onChange={inputTenchuongtrinh}
                                    defaultValue={tenchuongtrinh}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Tên Tài Khoản</Form.Label>
                                <Form.Control
                                    type="number"
                                    name="giamgia"
                                    placeholder="Nhập % Giảm giá"
                                    onChange={inputGiamgia}
                                    defaultValue={giamgia}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Ngày Bắt Đầu</Form.Label>
                                <Form.Control
                                    type={props.type === "create" ? "date" : "text"}
                                    name="ngaybatdau"
                                    placeholder="Nhập ngày bắt đầu"
                                    defaultValue={props.type === "create" ? ngaybatdau : Moment(props.type === "edit" || props.type === "view" ? props.value.ngaybatdau : null).format('DD/MM/YYYY')}
                                    onChange={inputNgaybatdau}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                                <Form.Label>Ngày Kết Thúc</Form.Label>
                                <Form.Control
                                    type={props.type === "create" ? "date" : "text"}
                                    name="ngayketthuc"
                                    placeholder="Nhập ngày kết thúc"
                                    defaultValue={props.type === "create" ? ngayketthuc : Moment(props.type === "edit" || props.type === "view" ? props.value.ngayketthuc : null).format('DD/MM/YYYY')}
                                    onChange={inputNgayketthuc}
                                    readOnly={props.type === "view" ? true : false}
                                />
                            </Form.Group>
                        </Form>
                    </Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>Đóng</Button>
                        {props.type === "create" ? <Button variant="primary" onClick={saveCreateCTKM}>Lưu</Button>
                            : props.type === "edit" ? <Button variant="primary" onClick={saveEditCTKM}>Lưu</Button>
                                : null
                        }
                    </Modal.Footer>
                </Modal>}
        </>
    );
}

export default FormQLCTKM
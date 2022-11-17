import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';
import FormQLNhanVien from '../form/FormQLNhanVien'

const ButtonDelete = ({ value }) => {
    const [show, setShow] = useState(false);

    const handleShow = () => setShow(true);

    return (
        <>
            <Button variant="danger" onClick={handleShow}>
                Xóa
            </Button>

            <FormQLNhanVien value={value} type={"delete"} show={show} setshow={setShow} />

            {/* <Modal show={show} onHide={handleClose} animation={false} centered>
                <Modal.Header closeButton>
                    <Modal.Title>Xóa nhân viên</Modal.Title>
                </Modal.Header>
                <Modal.Body>Bạn có chắc muốn xóa nhân viên <b>{value.idnhanvien} - {value.hoten}</b>?</Modal.Body>
                <Modal.Footer>
                    <Button variant="secondary" onClick={handleClose}>
                        Đóng
                    </Button>
                    <Button variant="primary" onClick={handleClose}>
                        Xác nhận
                    </Button>
                </Modal.Footer>
            </Modal> */}
        </>
    );
}

export default ButtonDelete
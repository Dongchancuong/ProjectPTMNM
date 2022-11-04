import './App.scss';
import 'bootstrap/dist/css/bootstrap.min.css';
import SideBar from '../components/sidebar/SideBar';
import NavBarAdmin from '../components/sidebar/NavBar'
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Dashboard from './admin/Dashboard';
import AuthAdmin from '../views/admin/Auth'
import AuthCustomer from '../views/customer/Auth'
import QLChucVu from './admin/QLChucVu';
import { QLSanPham, QLLoaiMay, QLMauSac, QLChatLieu, QLThuongHieu } from './admin/QLSanPham';
import QLTaiKhoan from './admin/QLTaiKhoan';
import QLNhanVien from './admin/QLNhanVien';
import QLKhachHang from './admin/QLKhachHang';
import QLHoaDon from './admin/QLHoaDon';
import QLPhieuDatHang from './admin/QLPhieuDatHang';
import QLPhieuNhapHang from './admin/QLPhieuNhapHang';
import QLCTKhuyenMai from './admin/QLCTKhuyenMai';
import QLNhaCungCap from './admin/QLNhaCungCap';
import { useState } from 'react';

function App() {
  const [dangnhap, setDangnhap] = useState(false)

  if (!dangnhap) {
    return (
      <Router>
        <Routes>
          <Route exact path='/' element={<AuthAdmin setDangnhap={setDangnhap} />} />
          <Route exact path='/AuthCustomer' element={<AuthCustomer />} />
        </Routes>
      </Router>
    )
  }
  else
    return (
      <Router>
        <SideBar />
        <NavBarAdmin />
        <div className='content-container'>
          <Routes>
            <Route exact path='/' element={<Dashboard />} />
            <Route exact path='/qlchucvu' element={<QLChucVu />} />
            <Route exact path='/qlsanpham' element={<QLSanPham />} />
            <Route exact path='/qlsanpham/qlloaimay' element={<QLLoaiMay />} />
            <Route exact path='/qlsanpham/qlmausac' element={<QLMauSac />} />
            <Route exact path='/qlsanpham/qlchatlieu' element={<QLChatLieu />} />
            <Route exact path='/qlsanpham/qlthuonghieu' element={<QLThuongHieu />} />
            <Route exact path='/qltaikhoan' element={<QLTaiKhoan />} />
            <Route exact path='/qlnhanvien' element={<QLNhanVien />} />
            <Route exact path='/qlkhachhang' element={<QLKhachHang />} />
            <Route exact path='/qlhoadon' element={<QLHoaDon />} />
            <Route exact path='/qlphieudathang' element={<QLPhieuDatHang />} />
            <Route exact path='/qlphieunhaphang' element={<QLPhieuNhapHang />} />
            <Route exact path='/qlchuongtrinhkhuyenmai' element={<QLCTKhuyenMai />} />
            <Route exact path='/qlnhacungcap' element={<QLNhaCungCap />} />
            <Route exact path='/AuthCustomer' element={<AuthCustomer />} />
          </Routes>
        </div >
      </Router>
    );
}

export default App;

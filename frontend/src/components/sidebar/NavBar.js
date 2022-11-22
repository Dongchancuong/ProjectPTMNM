import '../../styles/NavBar.scss'
import Nav from 'react-bootstrap/Nav';
import { Link } from 'react-router-dom';
import Navbar from 'react-bootstrap/Navbar';
import NavDropdown from 'react-bootstrap/NavDropdown';
import * as MdIcons from 'react-icons/md';
import AuthAPI from '../../views/admin/AuthAPI';

const NavBar = ({ title }) => {
    const { token, logout } = AuthAPI()
    const logoutTaiKhoan = (e) => {
        e.preventDefault()
        if (token != undefined) {
            logout()
        }
    }
    return (
        <div className="Nav-Bar-Admin">
            <span className='Nav-Bar-Title  fw-bold fs-5'>{title}</span>
            <Navbar className='Nav-Bar' variant="dark" expand="lg">
                <Nav className='Nav-Bar'>
                    <NavDropdown
                        id="nav-dropdown-dark-example"
                        title="Xin chào, Phúc Hải!"
                        menuVariant="dark"
                    >
                        <NavDropdown.Item><Link to="/thongtintaikhoan">Thông tin tài khoản</Link></NavDropdown.Item>
                        <NavDropdown.Divider />
                        <NavDropdown.Item
                            onClick={logoutTaiKhoan}>
                            <div className='Sub-Icon'>
                                <MdIcons.MdLogout className='Icon-Log-Out' />
                            </div>
                            Đăng xuất
                        </NavDropdown.Item>
                    </NavDropdown>
                </Nav>
            </Navbar>
        </div>
    )
}

export default NavBar
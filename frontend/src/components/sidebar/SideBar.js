import React, { useState } from 'react';
import styled from 'styled-components'
import { Link } from 'react-router-dom'
import * as FaIcons from 'react-icons/fa';
import * as AiIcons from 'react-icons/ai';
import { SideBarData } from './SideBarData';
import SubMenu from './SubMenu';
import { IconContext } from 'react-icons/lib';

const Nav = styled.div`
    background: #15171c;
    height: 60px;
    width: auto;
    display: flex;
    justify-content: flex-start;
    align-items: center;
`;

const NavIcon = styled(Link)`
    margin-left: 1rem;
    font-size: 2rem;
    height: 60px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    color: white;
`;

const SidebarNav = styled.nav`
    background: #15171c;
    width: ${({ sidebar }) => (sidebar ? '300px' : '70px')};
    height: 100vh;
    display: flex;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10;
`

const SidebarWrap = styled.nav`
    width: 100%;
`

const SideBar = () => {
    const [sidebar, setSidebar] = useState(true)

    const showSidebar = () => setSidebar(!sidebar)

    return (
        <IconContext.Provider value={{ color: '#fff' }}>
            <Nav></Nav>
            <SidebarNav sidebar={sidebar}>
                <SidebarWrap>
                    <NavIcon to='#'>
                        {sidebar ? <AiIcons.AiOutlineClose onClick={showSidebar} /> : <FaIcons.FaBars onClick={showSidebar} />}
                    </NavIcon>
                    {SideBarData.map((item, index) => {
                        return <SubMenu item={item} key={index} sidebar={sidebar} />;
                    })}
                </SidebarWrap>
            </SidebarNav>
        </IconContext.Provider>

    );
};

export default SideBar;



import React, {useState} from 'react'
import {Link} from 'react-router-dom'
import styled from 'styled-components'

const SidebarLink = styled(Link)`
    display: flex;
    color: #e1e9fc;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    list-style: none;
    height: 60px;
    text-decoration: none;
    font-size: 30px;
    &:hover {
        background: #252831;
        border-left: 4px solid #632ce4;
        cursor: pointer;
    }
`;

const SidebarLabel = styled.span`
    margin-left: 16px;
    font-size: 17px;
`;

const DropdownLink = styled(Link)`
    background: #414757;
    height: 60px;
    padding-left: ${({ sidebar }) => (sidebar ? '3rem' : '20px')};
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #fff;
    font-size: 30px;
    &:hover{
        border-left: 4px solid #372ccf;
        // background: #393e4d;
        background: linear-gradient(90deg, rgba(0,87,105,1) 0%, rgba(34,56,87,1) 50%, rgba(31,41,55,1) 100%);
        cursor: pointer;
    }
`

const SubMenu = ({ item, sidebar }) => {
    const [subnav, setSubnav] = useState(false)

    const showSubnav = () => setSubnav(!subnav)

    return (
        <>
            <SidebarLink to={item.path} onClick={item.subNav && showSubnav}>
                <div>
                    {item.icon}
                    <SidebarLabel>{sidebar ? item.title : !sidebar}</SidebarLabel>
                </div>
                <div>
                    {sidebar ? (item.subNav && subnav ? item.iconOpened : item.subNav ? item.iconClosed : null) : !sidebar}
                </div>
            </SidebarLink>
            {subnav && item.subNav.map((item, index) => {
                return (
                    <DropdownLink to={item.path} key={index}>
                        {item.icon}
                        <SidebarLabel>{sidebar ? item.title : !sidebar}</SidebarLabel>
                    </DropdownLink>
                )
            })}
        </>
    );
};

export default SubMenu
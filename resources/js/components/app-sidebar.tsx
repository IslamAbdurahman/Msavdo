import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem
} from '@/components/ui/sidebar';
import { Auth, type NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import {
    BookOpen,
    Folder,
    LayoutGrid,
    DollarSign,
    BadgeDollarSignIcon,
    Building2,
    Workflow,
    Users,
    Calendar, CalculatorIcon
} from 'lucide-react';
import AppLogo from './app-logo';
import { usePage } from '@inertiajs/react';
import { useMemo } from 'react';
import { useTranslation } from 'react-i18next';


export function AppSidebar() {

    const { t, i18n } = useTranslation();

    const footerNavItems: NavItem[] = [
        {
            title: t('sidebar.repository'),
            href: 'https://github.com/islamabdurahman',
            icon: Folder
        },
        {
            title: t('sidebar.telegram'),
            href: 'https://t.me/livelongevity',
            icon: BookOpen
        }
    ];


    const { auth } = usePage().props as unknown as { auth?: Auth };

    const isAdmin = auth?.user?.roles?.some(role => role.name === 'Admin');

    const filteredNavItems = useMemo((): NavItem[] => {
        const items: NavItem[] = [
            {
                title: t('sidebar.dashboard'),
                href: '/dashboard', icon: LayoutGrid
            },
            {
                title: t('sidebar.user'),
                href: '/user',
                icon: Users
            },
        ];

        return items.filter(item => {
            if (item.href === '/user' && !isAdmin) return false;
            return true;
        });
    }, [isAdmin, i18n.language]);

    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href="/dashboard" prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={filteredNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}

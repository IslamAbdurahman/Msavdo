import AppLayout from '@/layouts/app-layout';
import { Head, usePage, useForm } from '@inertiajs/react';
import { type BreadcrumbItem, type UserPaginate, SearchData } from '@/types';
import { useEffect } from 'react';
import { router } from '@inertiajs/react';
import UserTable from '@/components/user/user-table';
import SearchForm from '@/components/search-form';
import { useTranslation } from 'react-i18next';
import MobileSearchModal from '@/components/MobileSearchModal';

export default function User() {
    const { user } = usePage<{ user: UserPaginate }>().props;
    const { t } = useTranslation();  // Using the translation hook

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: t('user'),
            href: '/dashboard'
        }
    ];

    // Form handling for search and per_page
    const { data, setData } = useForm<SearchData>({
        search: '',
        per_page: user.per_page,
        page: user.current_page,
        total: user.total
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        router.get('/user', data); // ✅ Correct for search queries
    };


    useEffect(() => {
        const urlParams = new URLSearchParams(location.search);
        const searchQuery = urlParams.get('search') || ''; // Get 'search' query from the URL
        setData('search', searchQuery); // Set it to the form state
    }, [location.search]);

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="User" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                {/* Search and Per-Page Selection */}
                <div className="flex justify-end items-center">
                    <MobileSearchModal
                        data={data}
                        setData={setData}
                        handleSubmit={handleSubmit}
                    />
                    <div className={'hidden lg:block'}>
                        <SearchForm handleSubmit={handleSubmit} setData={setData} data={data} />
                    </div>
                </div>

                {/* Table */}
                <div className="overflow-x-auto">

                    <UserTable {...user} searchData={data} />

                </div>
            </div>
        </AppLayout>
    );
}

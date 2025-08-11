import AppLayout from '@/layouts/app-layout';
import { InertiaProps, type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },

];



export default function Dashboard() {
    const {auth} = usePage<InertiaProps>().props;
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
                <p>This is Dashboard page</p>
                <p className="text-2xl">Your are in <span className='underline'>{auth?.company?.name}</span></p>

            </div>
        </AppLayout>
    );
}

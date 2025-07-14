import { useForm } from '@inertiajs/react';
import { FormEventHandler, useRef, useState } from 'react';
import { useTranslation } from 'react-i18next';

import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';
import { toast } from 'sonner';
import 'react-time-picker/dist/TimePicker.css';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogTitle, DialogTrigger
} from '@/components/ui/dialog';
import { IoCreate } from 'react-icons/io5';
import { Firm, User } from '@/types';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';  // Import date-fns
interface createUser {
    user: User;
    firms: Firm[];
}

export default function CreateUserFirmModal({ user, firms }: createUser) {
    const { t } = useTranslation();
    const nameInput = useRef<HTMLInputElement>(null);

    const [open, setOpen] = useState(false);

    const { data, setData, post, processing, reset, errors, clearErrors } = useForm({
        user_id: user.id,
        firm_id: 0
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post('/user_firm', {
            preserveScroll: true,
            onSuccess: () => {
                toast.success(t('created_successfully'));
                reset();
                clearErrors();
                setOpen(false);
            },
            onError: (err) => {
                nameInput.current?.focus();
                // Display a friendly error message if available
                const errorMessage = err?.error || t('create_failed'); // Use fallback error message
                toast.error(errorMessage); // Display error message
            }
        });
    };

    return (
        <Dialog open={open} onOpenChange={setOpen}>
            <DialogTrigger asChild>
                <Button className={'px-1 py-1 text-sm font-medium bg-blue-600 text-white dark:bg-blue-600 '}>
                    <IoCreate />
                </Button>
            </DialogTrigger>

            <DialogContent className="dark:border-gray-400">
                <DialogDescription>
                    <DialogTitle>{t('modal.create_title')}</DialogTitle>
                    <DialogDescription>{t('modal.create_description')}</DialogDescription>
                </DialogDescription>

                <form onSubmit={submit} className="space-y-4">

                    <div>
                        <Label htmlFor="firm_id">{t('worker')}</Label>

                        <Select
                            value={data.firm_id?.toString() ?? 'placeholder'} // 👈 must be a string
                            onValueChange={(val) => {
                                if (val === 'placeholder') return;
                                setData('firm_id', parseInt(val)); // 👈 keep storing as number
                            }}
                        >
                            <SelectTrigger className="w-full">
                                <SelectValue placeholder={t('select')} />
                            </SelectTrigger>
                            <SelectContent>
                                {firms.map((worker) => (
                                    <SelectItem
                                        key={worker.id}
                                        value={worker.id.toString()} // 👈 must be string to match
                                    >
                                        {worker.name}
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>

                        <InputError message={errors.firm_id} />
                    </div>


                    <DialogFooter className="gap-2">
                        <DialogClose asChild>
                            <Button variant="secondary" onClick={() => {
                                reset();
                                clearErrors();
                                setOpen(false);
                            }}>
                                {t('cancel')}
                            </Button>
                        </DialogClose>

                        <Button type="submit" disabled={processing}>
                            {t('save')}
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}

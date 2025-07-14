import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogFooter,
    DialogTitle,
    DialogDescription
} from '@/components/ui/dialog';
import { useTranslation } from 'react-i18next';

interface DeleteItemModalProps {
    item: { id: number, name?: string };
    open: boolean;
    setOpen: (open: boolean) => void;
    onDelete: (id: number) => void; // Callback function to handle deletion
}

export default function DeleteItemModal({ item, open, setOpen, onDelete }: DeleteItemModalProps) {
    const { t } = useTranslation();

    const handleDelete = () => {
        onDelete(item.id); // Call the onDelete function passed as a prop
        setOpen(false); // Close the modal
    };

    return (
        <Dialog open={open} onOpenChange={setOpen}>
            <DialogContent>
                <DialogTitle>{t('modal.delete_title')}</DialogTitle>
                <DialogDescription>
                    <p>{t('modal.delete_confirmation')}</p>
                    <p>{t('delete')} {item.name}</p>
                </DialogDescription>

                <DialogFooter className="gap-2">
                    <DialogClose asChild>
                        <Button variant="secondary" onClick={() => setOpen(false)}>
                            {t('cancel')}
                        </Button>
                    </DialogClose>
                    <Button variant="destructive" onClick={handleDelete}>
                        {t('delete')}
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

    );
}
